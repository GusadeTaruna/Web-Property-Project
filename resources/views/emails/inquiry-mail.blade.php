<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inquiry Message</title>
</head>
<body>
    <h2>New Inquiry Message arrived!</h2>
    <div>
        <h3>Email from : {{ $detailsInquiry['name'] }} ({{ $detailsInquiry['email'] }})</h3>
        <h3>Country : {{ $detailsInquiry['country'] }}</h3>
        <h3>Phone Number : {{ $detailsInquiry['phone'] }}</h3>
        <br>
        <h3>Inquiry List :
            @if (is_array($detailsInquiry['inquiry_list']))
                @foreach ($detailsInquiry['inquiry_list'] as $list)
                    @if( !$loop->last)
                        <span style="font-weight: bold">{{ $list }}, </span>
                    @else
                        <span style="font-weight: bold">{{ $list }} </span>
                    @endif
                @endforeach
            @else
                <span style="font-weight: bold">{{ $detailsInquiry['inquiry_list'] }} </span>
            @endif
            
        </h3>
    </div>
    Message: <br>
    <p>{{ $detailsInquiry['message'] }}</p>
    
</body>
</html>