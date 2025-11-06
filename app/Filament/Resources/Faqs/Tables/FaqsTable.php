<?php

namespace App\Filament\Resources\Faqs\Tables;

use App\Models\Faq;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Forms\Components\Radio;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class FaqsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('submodule_id')
                    ->label('ID Website Feature')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->placeholder('Tidak ada di website feature'),

                TextColumn::make('submodule.name')
                    ->label('Nama Website Feature')
                    ->sortable()
                    ->searchable()
                    ->placeholder('Tidak ada di website feature'),
                
                TextColumn::make('mobile_feature_id')
                    ->label('ID Mobile Feature')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->placeholder('Tidak ada di mobile feature'),

                TextColumn::make('mobileFeature.name')
                    ->label('Nama Mobile Feature')
                    ->sortable()
                    ->searchable()
                    ->placeholder('Tidak ada di mobile feature'),

                TextColumn::make('question')
                    ->label('Pertanyaan')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(fn (TextColumn $column) => $column->getState()),

                TextColumn::make('answer')
                    ->label('Jawaban')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(fn (TextColumn $column) => $column->getState()),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diupdate Pada')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('feature_type')
                    ->label('Tipe Feature')
                    ->placeholder('Semua tipe')
                    ->trueLabel('Website Feature saja')
                    ->falseLabel('Mobile Feature saja')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('submodule_id')->whereNull('mobile_feature_id'),
                        false: fn ($query) => $query->whereNull('submodule_id')->whereNotNull('mobile_feature_id'),
                        blank: fn ($query) => $query,
                    ),

                SelectFilter::make('submodule')
                    ->label('Nama Website Feature')
                    ->searchable()
                    ->preload()
                    ->relationship('submodule', 'name'),

                SelectFilter::make('mobileFeature')
                    ->label('Nama Mobile Feature')
                    ->searchable()
                    ->preload()
                    ->relationship('mobileFeature', 'name'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                // Tombol Ekspor PDF selalu muncul
                Action::make('exportPdf')
                    ->label('Ekspor PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->form([
                        Radio::make('feature_type')
                            ->label('Tipe Feature')
                            ->options([
                                'all' => 'Semua',
                                'website' => 'Website Feature',
                                'mobile' => 'Mobile Feature',
                            ])
                            ->default('all'),
                    ])
                    ->action(function (array $data) {
                        $query = Faq::with(['submodule', 'mobileFeature']);

                        if ($data['feature_type'] === 'website') {
                            $query->whereNotNull('submodule_id')->whereNull('mobile_feature_id');
                            $columns = ['submodule', 'question', 'answer', 'created_at', 'updated_at'];
                        } elseif ($data['feature_type'] === 'mobile') {
                            $query->whereNull('submodule_id')->whereNotNull('mobile_feature_id');
                            $columns = ['mobileFeature', 'question', 'answer', 'created_at', 'updated_at'];
                        } else { // all
                            $columns = ['submodule', 'mobileFeature', 'question', 'answer', 'created_at', 'updated_at'];
                        }

                        $faqs = $query->get();

                        $pdf = Pdf::loadView('exports/faqs-pdf-dynamic', [
                            'faqs' => $faqs,
                            'columns' => $columns,
                            'data' => $data,])
                            ->setPaper('a4', 'portrait');

                        return Response::streamDownload(
                            fn () => print($pdf->output()),
                            'data-faq-' . now()->format('Ymd_His') . '.pdf'
                        );
                    }),

                // Bulk delete tetap ada
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(null);
    }
}
