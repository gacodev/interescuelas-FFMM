                        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                        <form action="{{route('participants.import.excel')}}" method="post" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <button class="bton btn-primary">Importar Participantes</button>
                        </form>    
    
</body>
</html>