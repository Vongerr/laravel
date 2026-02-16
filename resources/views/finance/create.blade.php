@extends('layouts.app')

@section('title', 'Создать Пункт')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Создать новый пункт</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('finance.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="budget_category" class="form-label">Категория бюджета</label>
                    <input type="text" class="form-control @error('budget_category') is-invalid @enderror"
                           id="budget_category" name="budget_category" value="{{ old('budget_category') }}" required>
                    @foreach($categories as $code => $name)
                        <option value="{{ $code }}" {{ old('category') == $code ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                    @error('budget_category')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label">Категория</label>
                    <select class="form-select @error('category') is-invalid @enderror"
                           id="category" name="category" required>
                    <option value="">-- Выберите категорию --</option>
                    @foreach($categories as $code => $name)
                        <option value="{{ $code }}" {{ old('category') == $code ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Дата</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                              id="date" name="date" required>{{ old('date') }}
                    @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="time" class="form-label">Время</label>
                    <input type="time" class="form-control @error('time') is-invalid @enderror"
                              id="time" name="time" required>{{ old('time') }}
                    @error('time')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="money" class="form-label">Деньги</label>
                        <input type="number" step="0.01" class="form-control @error('money') is-invalid @enderror"
                               id="money" name="money" value="{{ old('money') }}" required>
                        @error('money')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="bank" class="form-label">Название банка</label>
                    <select class="form-select @error('bank') is-invalid @enderror"
                            id="bank" name="bank" required>
                        <option value="">-- Выберите банк --</option>
                        @foreach($banks as $code => $name)
                            <option value="{{ $code }}" {{ old('bank') == $code ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('bank')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exclusion" class="form-label">Исключение</label>
                    <input type="checkbox" class="form-control @error('exclusion') is-invalid @enderror"
                           id="exclusion" name="exclusion" value="{{ old('exclusion') }}" required>
                    @error('exclusion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Создать пункт</button>
                <a href="{{ route('finance.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
