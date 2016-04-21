<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            bgs-stat-counter {
                position: absolute;
                top: 1em;
                left: 1em;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <bgs-stat-counter>
            Pictures uploaded: <em>{{ $photosUploaded }}</em>
        </bgs-stat-counter>
        <div class="container">
            <div class="content">
                <div class="title">Find out more<br>
                about the development of<br>
                <em><strong>Better Garage Sale</strong></em><br>
                at <a href="http://patrick.zeinert.us" target="_blank">Patrick.Zeinert.US</a></div>
            </div>
        </div>
    </body>
</html>
