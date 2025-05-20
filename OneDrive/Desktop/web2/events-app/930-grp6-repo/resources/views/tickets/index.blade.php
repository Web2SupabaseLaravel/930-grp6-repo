@extends('layouts.app')

@section('content')
<div class="container">
    <h2>قائمة التذاكر</h2>
    <table class="table">
        <thead>
            <tr>
                <th>العنوان</th>
                <th>السعر</th>
                <th>الكمية</th>
                <th>التاريخ</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{ $ticket->title }}</td>
                <td>{{ $ticket->price }}</td>
                <td>{{ $ticket->quantity }}</td>
                <td>{{ $ticket->date }}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('tickets.edit', ['ticket' => $ticket->ticket_id]) }}" class="btn btn-primary">تعديل</a>
                    
                    <form action="{{ route('tickets.destroy', ['ticket' => $ticket->ticket_id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                    </form>
                    
                    @if($ticket->free)
                        <form action="{{ route('tickets.activate', ['id' => $ticket->ticket_id]) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success">تفعيل</button>
                        </form>
                    @else
                        <form action="{{ route('tickets.deactivate', ['id' => $ticket->ticket_id]) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-warning">تعطيل</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection