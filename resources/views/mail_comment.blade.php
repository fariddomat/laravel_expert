<!DOCTYPE html>
<html>
<head>
    <style>
         * {
            text-align: right
        }
        body {
            font-family: 'Cairo' !important;

            background-color: #E2E2E2 !important;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.1) !important;
        }
        .button {
            font-family: 'Cairo' !important;
            font-size: 1.2rem !important;
            display: inline-block;
            padding: 10px 20px;
            background-color: #DF1F26;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 2px;
        }
        h2{
            font-size: 2rem !important;
            font-family: 'Cairo' !important;
        }
        p{
            font-size: 1.2rem !important;
            font-family: 'Cairo' !important;
        }
    </style>
</head>
<body dir="rtl">
    <div class="email-container">
        <h2>مرحبا {{ $name }}!</h2>
        <p>شكرا لك لإضافة تعليق <br><br>
            سنقوم بمراجعة تعليقك في أقرب وقت<br>
            شكرا لاهتمامك.<br>
            <br>
        </p>

        <a href="https://almohtarif-office.com" class="button">شركة المحترف</a>
    </div>
</body>
</html>
