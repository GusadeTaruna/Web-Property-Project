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
        <p style="font-weight: bold">Email from : {{ $detailsInquiry['name'] }} ({{ $detailsInquiry['email'] }})</p>
        <p style="font-weight: bold">Nationality : {{ $detailsInquiry['country'] }}</p>
        <p style="font-weight: bold">Phone Number : {{ $detailsInquiry['phone'] }}</p>
        <p style="font-weight: bold">Prefered contact method : {{ $detailsInquiry['contact_method'] }}</p>
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
    <br>
    <h5>Message :</h5>
    <h5>{{ $detailsInquiry['message'] }}</h5>
    
</body>
</html>