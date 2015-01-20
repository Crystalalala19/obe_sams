<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />

    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/bootstrap-editable.css" rel="stylesheet">
    <link href="assets/bootstrap-filterable.css" rel="stylesheet">
    <link href="http://lightswitch05.github.io/filterable/stylesheets/main.css" rel="stylesheet">

    <title>Filterable</title>
  </head>

  <body>
 
   
    <!-- MAIN CONTENT -->
    <div class="container">
      <div class="row center span10">
        <h1>Demo <small>Click one of the <i class="icon-filter"></i> 's below to begin</small></h1>
        <table id="example-table" class="table table-striped table-hover table-condensed">
          <tr>
            <th>Make <i class="icon-filter"></i></th>
            <th>Model</th>
            <th>Color</th>
            <th>Year</th>
          </tr>
          <tbody>
            <tr>
              <td>Ford</td>
              <td>Escort</td>
              <td>Blue</td>
              <td>2000</td>
            </tr>
            <tr>
              <td>Ford</td>
              <td>Ranger</td>
              <td>Blue</td>
              <td>1990</td>
            </tr>
            <tr>
              <td>Toyota</td>
              <td>Tacoma</td>
              <td>Red</td>
              <td>2012</td>
            </tr>
            <tr>
              <td>Ford</td>
              <td>Mustang</td>
              <td>Silver</td>
              <td>2012</td>
            </tr>
            <tr>
              <td>Mercury</td>
              <td>Sable</td>
              <td>Silver</td>
              <td>2002</td>
            </tr>
            <tr>
              <td>Toyota</td>
              <td>Corolla</td>
              <td>Blue</td>
              <td>2012</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- FOOTER  -->
    <footer class="footer">
      <div class="container">
        <p class="copyright">
          Filterable &copy; <a href="https://github.com/lightswitch05">Daniel White</a> 2013.
          Released under the <a href="https://github.com/lightswitch05/filterable/blob/master/MIT-LICENSE">MIT license</a>.
        </p>
      </div>
    </footer>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script src="assets/bootstrap-editable.min.js"></script>
  <script src="assets/filterable-utils.js"></script>
  <script src="assets/filterable-cell.js"></script>
  <script src="assets/filterable-row.js"></script>
  <script src="assets/filterable.js"></script>
  <script type="text/javascript">
    $('table').filterable();
  </script>

  </body>
</html>