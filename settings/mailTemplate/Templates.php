<?php

class Templates{
    
    public static function htmlTemplate($body,$font_size = '14',$width = '600',$font_family = 'sans-serif'){

        return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <!--[if !mso]><!-->
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <!--<![endif]-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title></title>
            <link rel="stylesheet" type="text/css" href="styles.css" />
            <!--[if (gte mso 9)|(IE)]>
            <style type="text/css">
                table {border-collapse: collapse;}
            </style>
            <![endif]-->

                <style>
                        /* Basics */

                        body {
                                margin: 0 auto !important;
                                padding: 0;
                                background-color: #ffffff;
                        }

                        table {
                                border-spacing: 0;
                                font-family: '.$font_family.';
                                color: #333333;
                        }

                        td {
                                padding: 0;
                        }

                        img {
                                border: 0;
                        }

                        div[style*="margin: 16px 0"] { 
                                margin:0 !important;
                        }

                        .wrapper {
                                width: 100%;
                                table-layout: fixed;
                                -webkit-text-size-adjust: 100%;
                                -ms-text-size-adjust: 100%;
                        }

                        .webkit {
                                max-width: '.$width.'px;
                                margin: 0 auto;
                        }

                        .full-width-image img {
                                width: 100%;
                                max-width: '.$width.'px;
                                height: auto;
                        }

                        .inner {
                                padding: 10px;
                        }

                        p {
                                Margin: 0;
                        }

                        a {
                                color: #ee6a56;
                                text-decoration: none;
                        }

                        .h1 {
                                font-size: 21px;
                                font-weight: bold;
                                Margin-bottom: 18px;
                        }

                        .h2 {
                                font-size: 18px;
                                font-weight: bold;
                                Margin-bottom: 12px;
                        }

                        /* One column layout */

                        .one-column .contents {
                                text-align: left;
                        }
                        .one-column p {
                                font-size: '.$font_size.'px;
                                Margin-bottom: 10px;
                        }

                        /*Two column layout*/
                        .two-column {
                                text-align: center;
                                font-size: 0;
                        }

                        .two-column .column {
                                width: 100%;
                                max-width: '.($width/2).'px;
                                display: inline-block;
                                vertical-align: top;
                        }
                        .contents {
                                width: 100%;
                        }
                        .two-column .contents {
                                font-size: '.$font_size.'px;
                                text-align: left;
                        }
                        .two-column img {
                                width: 100%;
                                max-width: '.($width/2-20).'px;
                                height: auto;
                        }
                        .two-column .text {
                                padding-top: 10px;
                        }

                        /*Three column layout*/

                        .three-column {
                                text-align: center;
                                font-size: 0;
                                padding-top: 10px;
                                padding-bottom: 10px;
                        }
                        .three-column .column {
                                width: 100%;
                                max-width: '.($width/3).'px;
                                display: inline-block;
                                vertical-align: top;
                        }
                        .three-column .contents {
                                font-size: '.$font_size.'px;
                                text-align: center;
                        }
                        .three-column img {
                                width: 100%;
                                max-width: '.($width/3-20).'px;
                                height: auto;
                        }
                        .three-column .text {
                                padding-top: 10px;
                        }


                        /*Media Queries*/
                        @media screen and (max-width: 400px) {

                                .two-column .column,
                                .three-column .column {
                                        max-width: 100% !important;
                                }
                                .two-column img {
                                        max-width: 100% !important;
                                }
                                .three-column img {
                                        max-width: 50% !important;
                                }
                        }

                        @media screen and (min-width: 401px) and (max-width: 620px) {
                        .three-column .column {
                                        max-width: 33% !important;
                                }
                                .two-column .column {
                                        max-width: 50% !important;
                                }
                        }

                </style>
        </head>
        <body>
            <center class="wrapper">
                <div class="webkit">

                   <!--[if (gte mso 9)|(IE)]>
                                <table width="'.$width.'" align="center">
                                <tr>
                                <td>
                                <![endif]-->
                                <table class="outer" align="center">

                                    '.$body.'


                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                </td>
                                </tr>
                                </table>
                                <![endif]-->

                </div>
            </center>
        </body>
        </html>';

    }
}