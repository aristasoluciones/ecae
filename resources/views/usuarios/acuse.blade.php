<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Acuse</title>
        <style>
            @page {
                margin: 0cm 0cm;
                font-family: Arial;
            }

            body {
                margin: 3cm 2cm 2cm;
            }

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                background-color: #2a0927;
                color: white;
                text-align: center;
                line-height: 30px;
            }

            footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                background-color: #2a0927;
                color: white;
                text-align: center;
                line-height: 35px;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Acuse de generacion de cuentas de acceso a plataforma.</h1>
        </header>
        <main>
            <p>Cuenta de acceso a la plataforma Candidatos y candidatas conoceles</p>
            <p><b>Nombre     :</b> {{$name}}</p>
            <p><b>Usuario    :</b> {{$email}}</p>
            <p><b>Contraseña :</b> {{$pass}}</p>
        </main>
        <footer>
            <h4 style="float: left">Instituto de elecciones y participacion ciudadana de chiapas</h4>
        </footer>
    </body>
</html>
