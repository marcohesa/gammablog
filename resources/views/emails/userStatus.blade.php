<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <style>

        .padd {
            padding-right: 60px!important; padding-left: 60px!important;
        }

        #logo {
            background-color: #1cc37e !important;

        }

        img {
            width: 130px !important;
            display: block;
            margin: auto;
        }

       

        h1 {
            font-size: 22px !important;
            font-weight: bold !important;
            color: #3B3E45 !important;
            text-align: center !important;
        }
        h2 {
            font-size: 30px !important;
            font-weight: bold !important;
            color: #ffffff !important;
            text-align: center !important;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        p {
            font-size: 15px !important;
            color: #3B3E45 !important;
            text-align: center !important;
            padding-bottom: 0px !important;
        }

        .link {
            color: #1D69F3 !important;
            text-align: center !important;
            margin: auto !important;
            padding-top: 4px !important;
            padding-bottom: 4px !important;
            padding-left: 15px !important;
            padding-right: 15px !important;
            word-wrap: break-word !important;
        }

        .box {
            background: #ebf6fc !important;
            border: #406edd 2px dashed !important;
            margin-left: 20px !important;
            margin-right: 20px !important;
        }

        .boton {
            background-color: #1D69F3 !important;
            border: none !important;
            border-radius: 25px !important;
            padding: 8px !important;
            display: flex !important;
            align-items: center !important;
            height: 30px !important;
            width: 80% !important;
            color: white !important;
            font-weight: bold !important;
            text-align: center !important;
            margin: auto !important;
            text-decoration: none !important;
        }

        body {
            
            padding: 0!important;
            margin: 0!important;
            font-family: sans-serif !important;
            background: #EAEDF2!important;
        }

        #subject {
            width: 540px !important;
            background-color: white;
         
            margin: auto!important;
        }


        @media (max-width: 600px) {
            .padd {
                padding-right: 30px!important; padding-left: 30px!important;
            }


            .boton {
             
                width: 80%!important;
               
            }

            #subject {
                width: 440px !important;
            }
        }
        
    </style>
</head>

<body>


    <section style="background: #EAEDF2!important;">
        <div id="subject">
            <div id="logo">
    
                <h2>INTEGRALIDAD GAMMA</h2>
    
            </div>
            <div class="padd">
                <br><br>
             
                <p>
                    Hola {{ $user->name }} <br>
                </p>
                <p>
                    {{ $data }}
                </p> 
    
                <img style="width: 20%!important;" src="https://axincapital.app/images/axin/correo.png" alt="waves">
                <br><br>
                <p style="font-size: 17px!important;">
                    Atentamente, Integralidad gamma. <br>
                    
                    <a href="https://amaliath3code.com/big/posts"><strong>Iniciar sesión</strong></a>
    
                </p> <br>
    
    
            </div>
            
        </div>
    </section>



</body>

</html>