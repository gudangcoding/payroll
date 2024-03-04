<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\EnumSelect;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('departement_id')
                            ->label('Departement')
                            ->options(\App\Models\Departement::pluck('nama', 'id')->toArray())
                            ->required(),

                        Select::make('position_id')
                            ->label('Position')
                            ->options(\App\Models\Position::pluck('name', 'id')->toArray())
                            ->required(),

                        TextInput::make('name')
                            ->label('Name')
                            ->required(),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(),

                        DateTimePicker::make('joined')
                            ->label('Joined')
                            ->required(),

                        Select::make('status')
                            ->label('Status')
                            ->options(['Y' => 'Y', 'N' => 'N'])
                            ->default('tidak aktif')
                            ->required(),

                        Select::make('leaverequests')
                            ->label('Leave Requests')
                            ->options(\App\Models\Leaverequest::pluck('id', 'id')->toArray()),

                        Select::make('sallaries')
                            ->label('Sallaries')
                            ->options(\App\Models\Sallary::pluck('id', 'id')->toArray()),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('departement.nama'),
                TextColumn::make('position.name'),
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('joined'),
                TextColumn::make('status'),
                TextColumn::make('leaverequests'),
                TextColumn::make('sallaries'),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
