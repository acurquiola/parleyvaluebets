<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">

    <title>PVB!</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  </head>
  <body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-left text-muted">
                    ParleyValueBets
                </h3>
                <div style="margin-top: 10px" class="btn-group">
                    <a href="{{action('XmlReaderController@index')}}">
                        <button class="btn btn-default" type="button">
                            <em class="glyphicon glyphicon-chevron-right"></em> Ver Reporte
                        </button>
                    </a> 
                    <a href="{{action('XmlReaderController@getXml')}}">
                        <button class="btn btn-default" type="button">
                            <em class="glyphicon glyphicon-chevron-right"></em> Leer XML
                        </button>
                    </a> 
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/jquery.min.js') }}" ></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('/js/scripts.js') }}" ></script>
  </body>
</html>