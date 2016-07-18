<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" integrity="sha384-XXXXXXXX" crossorigin="anonymous">
        <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" integrity="sha384-XXXXXXXX" crossorigin="anonymous"></script>

    </head>
    <body>
        @if ($markets->count()>0)
            @foreach ($markets as $market)
            <table class="table table-striped" >
                <thead>
                    <th>
                        <td align="center" colspan="6" >MARKET</td>
                    </th>
                    <th>
                        <td align="center" >ID</td>
                        <td align="center">Nombre</td>
                        <td align="center">BetTillDate</td>
                        <td align="center">BetTillTime</td>
                        <td align="center">LastUpdateDate</td>
                        <td align="center">LastUpdateTime</td>
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td align="center"></td>
                        <td align="center">{{$market->marketID}}</td>
                        <td align="left">{{$market->name}}</td>
                        <td align="center">{{$market->betTillDate}}</td>
                        <td align="center">{{$market->betTillTime}}</td>
                        <td align="center">{{$market->lastUpdateDate}}</td>
                        <td align="center">{{$market->lastUpdateTime}}</td>
                    </tr>
                    <table class="table">
                        <thead>
                            <th>
                                <td align="center" colspan="6" >PARTICIPANT</td>
                            </th>
                        </thead>
                        <thead>
                            <th>
                                <td align="center">ID</td>
                                <td align="center">Nombre</td>
                                <td align="center">OddsDecimal</td>
                                <td align="center">LastUpdateDate</td>
                                <td align="center">LastUpdateTime</td>
                            </th>
                        </thead>
                        <tbody>
                        @foreach ($market->participants as $participant)
                            <tr>
                                <td align="center"></td>
                                <td align="center">{{$participant->participantID}}</td>
                                <td align="left">{{$participant->name}}</td>
                                <td align="center">{{$participant->oddsDecimal}}</td>
                                <td align="center">{{$participant->lastUpdateDate}}</td>
                                <td align="center">{{$participant->lastUpdateTime}}</td>
                            </tr>
                            @if($participant->historico->count() > 0)
                                @foreach ($participant->historico as $historico)
                                    <tr>
                                        <td align="center"></td>
                                        <td align="center">{{$historico->participantID}}</td>
                                        <td align="left">{{$historico->name}}</td>
                                        <td align="center">{{$historico->oddsDecimal}}</td>
                                        <td align="center">{{$historico->lastUpdateDate}}</td>
                                        <td align="center">{{$historico->lastUpdateTime}}</td>
                                        <td align="center">HISTÓRICO</td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @endforeach
            @else
                No hay registros disponibles
            @endif
            </tbody>
        </table>
    </body>
</html>
