<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BakeTest - Twitter API</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css">
        <link rel="stylesheet" type="text/css" href="http://getbootstrap.com/examples/navbar/navbar.css">
    </head>
    <body>
<nav class="navbar navbar-inverse">
    <div class="container">
         <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav" role="tablist">
                <li class="active">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a>
                </li>
                <li>
                    <a href="#search" aria-controls="search" role="tab" data-toggle="tab">Search</a>
                </li>
            </ul>
             </div>
    </div>
</nav>
        
        <div class="container">

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <!-- Main component  -->
                    <div class="jumbotron">
                        <h1>Welcome to my Twitter API</h1>
                        <p>With this API you can search the last tweets filtering by user or by word</p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="#search" role="button">Start search &raquo;</a>
                        </p>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="search">
                    <!-- Main component  -->
                    <div class="jumbotron">
                        <h2>Search</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-group">
                                        <input type="text" name="user" id="user" class="form-control" placeholder="Type an user">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" onclick="ajaxSearchByUser();">Go!</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="col-lg-6 col-md-6">
                                        <div class="input-group">
                                            <input type="text" name="criteria" id="criteria" class="form-control" placeholder="Type a word" value="php">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" onclick="ajaxSearchByCriteria();">Go!</button>
                                            </span>
                                        </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                    </div> <!-- /container -->
                    <div class="row">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Twitter Id</th>
                                <th>Message</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody id="template1"></tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
        <script src="js/jquery.tmpl.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="js/global.js"></script>
        <script type="text/x-jquery-tmpl" id="twitterTmpl">
                <tr>
                    <td>${twitterID}</td>
                    <td>${message}</td>
                    <td><b>${name}</b> @${screenName}</td>
                </tr>
            </script>
    </body>
</html>