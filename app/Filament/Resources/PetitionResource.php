<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PetitionResource\Pages;
use App\Filament\Resources\PetitionResource\RelationManagers;
use App\Models\Petition;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PetitionResource extends Resource
{
    protected static ?string $model = Petition::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->disabled(),
                RichEditor::make('desc')->disabled(),
                Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'reject' => 'Reject',
                    'close' => 'Close',
                    'published' => 'Published',
                ]),
                Select::make('user_id')
                ->options([
                    'user_id' => User::pluck('id')->all()
                ])->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('user.name')->searchable(),
                IconColumn::make('status')
                ->icon(fn (string $state): string => match ($state) {
                    'pending' => 'heroicon-o-clock',
                    'published' => 'heroicon-o-check-circle',
                    'close' => 'heroicon-o-lock-closed',
                    'win' => 'heroicon-o-trophy',
                    'reject' => 'heroicon-o-x-circle',
                })
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'info',
                    'published' => 'success',
                    'close' => 'gray',
                    'win' => 'warning',
                    'reject' => 'danger'
                }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPetitions::route('/'),
            'create' => Pages\CreatePetition::route('/create'),
            'edit' => Pages\EditPetition::route('/{record}/edit'),
        ];
    }
}
