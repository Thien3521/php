<!DOCTYPE html>
<html>
<head>
    <title>Thông báo đặt lịch Spa thành công</title>
    <style>
        /* CSS cho giao diện email */
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        
        h1 {
            text-align: center;
        }
        
        p {
            margin-bottom: 20px;
        }
        
        .row {
            margin-bottom: 10px;
        }
        
        .row label {
            font-weight: bold;
        }
        
        .row span {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    @foreach($booking as $booking)
    <div class="container">
        <h1>Thông báo đặt lịch Spa thành công</h1>
        
        <p>Xin chào <strong>{{$booking->booking_user->bk_user_name}}</strong>,</p>
        
        <p>Chúng tôi xin thông báo rằng đơn lịch đặt Spa của bạn đã được xác nhận thành công.</p>
        
        <div class="row">
            <label>Ngày đặt lịch:</label>
            <span>{{ $booking->booking_day }}</span>
        </div>
        
        <div class="row">
            <label>Loại dịch vụ:</label>
            <span>{{$booking->booking_service->admin_service_name}}</span>
        </div>
        
        <div class="row">
            <label>Giờ đặt lịch:</label>
            <span>{{ $booking->booking_shift }}</span>
        </div>
        
        <div class="row">
            <label>Địa điểm:</label>
            <span>{{$booking->service->adminInformation->adminAddress->admin_address}}</span>
        </div>
        
        <p>Cảm ơn bạn đã sử dụng dịch vụ Spa của chúng tôi. Hãy liên hệ với chúng tôi nếu bạn có bất kỳ câu hỏi nào.</p>
        
        <p>Trân trọng,</p>
        <p>Spa PuPu</p>
    </div>
    @endforeach
</body>
</html>