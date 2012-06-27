<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <title>Arithmophile API</title>
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
  <script type="text/javascript" src="/jstools/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
  <style type="text/css">
    body { margin-top:40px; }
    h1 { text-align:center; margin-bottom:20px; }
    th { text-align:left; background:#eee; }
  </style>
</head>
<body>
<div class="container">
  <h1>Arithmophile API</h1>
  <p>A playful project by <a href="http://www.twitter.com/retorick">retorick</a></p>
  <div class="row">
    <div class="span12">

      <table class="table table-bordered">
        <tr>
          <th colspan="2">Decimal Calculator</th>
        </tr><tr>
          <td>/dc/[denominator](/[numerator])</td>
          <td>
            <p>Specify denominator and optional numerator</p>
           
            <span class="label label-info">Examples</span>
            <p class="examples">
              http://api.arithmophile.com/dc/7 - <span class="explanation">returns decimals having a denominator of 7.</span><br/>
              http://api.arithmophile.com/dc/49/5 - <span class="explanation">returns decimal for fraction 5/49.</span><br/>
            </p>
          </td>
        </tr><tr>
          <th colspan="2">Triangular Numbers</th>
        </tr><tr>
          <td>/tri/upto/[nth]</td>
          <td>
            <p>List the triangular numbers, up to the nth.  (e.g., If nth is 3, list includes 1, 3, 6.)</p>

            <span class="label label-info">Examples</span>
            <p class="examples">
              http://api.arithmophile.com/tri/upto/5 - <span class="explanation">returns triangular numbers 1, 3, 6, 10, 15.</span><br/>
            </p>
          </td>
        </tr><tr>
          <td>/tri/[from nth]/to/[to nth]</td>
          <td>
            <p>List the triangular numbers within the specified range.</p>

            <span class="label label-info">Examples</span>
            <p class="examples">
              http://api.arithmophile.com/tri/3/to/5 - <span class="explanation">returns triangular numbers 6, 10, 15.</span><br/>
            </p>
          </td>
        </tr><tr>
          <td>/tri/test/[number]</td>
          <td>
            <p>Check the specified number to determine whether it is triangular.</p>

            <span class="label label-info">Examples</span>
            <p class="examples">
              http://api.arithmophile.com/tri/test/10 <span class="explanation"></span><br/>
              http://api.arithmophile.com/tri/test/12 <span class="explanation"></span><br/>
            </p>
          </td>
        </tr><tr>
          <th colspan="2">Golden Ratio (phi)</th>
        </tr><tr>
          <td>/phi/[number of digits]</td>
          <td>Returns the number phi, to the specified number of places after the decimal.</td>
        </tr><tr>
          <td>/phi/powers(/[maximum power])</td>
          <td>Returns the powers of phi, up to the indicated maximum.</td>
        </tr><tr>
          <th colspan="2">Prime Numbers</th>
        </tr><tr>
          <td>/p/upto/[maximum]</td>
          <td>Returns a list of the prime numbers less than or equal to specified maximum.</td>
        </tr><tr>
          <td>/p/[between a]/[and b]</td>
          <td>Returns a list of the prime numbers between the two specified.</td>
        </tr><tr>
          <td>/p/[number]</td>
          <td>Indicate whether the number is prime.  Return its factors if composite.</td>
        </tr>
      </table>

      <p>Code at <a href="https://github.com/arithmophile/number-functions-api">https://github.com/arithmophile/number-functions-api</a></p>
    </div>
  </div>
</div>
</body>
</html>

