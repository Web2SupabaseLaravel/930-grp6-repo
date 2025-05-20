@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل التذكرة</h2>
    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">العنوان</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $ticket->title }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">السعر</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $ticket->price }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">الكمية</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $ticket->quantity }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">التاريخ</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $ticket->date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection