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
              <a href="/dc/7">http://api.arithmophile.com/dc/7</a> - <span class="explanation">Returns decimals having a denominator of 7.</span><br/>
              <a href="/dc/49/5">http://api.arithmophile.com/dc/49/5</a> - <span class="explanation">Returns decimal for fraction 5/49.</span><br/>
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
              <a href="/tri/upto/5">http://api.arithmophile.com/tri/upto/5</a> - <span class="explanation">Returns triangular numbers 1, 3, 6, 10, 15.</span><br/>
            </p>
          </td>
        </tr><tr>
          <td>/tri/[from nth]/[to nth]</td>
          <td>
            <p>List the triangular numbers within the specified range.</p>

            <span class="label label-info">Examples</span>
            <p class="examples">
              <a href="/tri/3/5">http://api.arithmophile.com/tri/3/5</a> - <span class="explanation">Returns triangular numbers 6, 10, 15.</span><br/>
            </p>
          </td>
        </tr><tr>
          <td>/tri/test/[number]</td>
          <td>
            <p>Check the specified number to determine whether it is triangular.</p>

            <span class="label label-info">Examples</span>
            <p class="examples">
              <a href="/tri/test/10">http://api.arithmophile.com/tri/test/10</a> <span class="explanation"></span><br/>
              <a href="/tri/test/12">http://api.arithmophile.com/tri/test/12</a> <span class="explanation"></span><br/>
            </p>
          </td>
        </tr><tr>
          <th colspan="2">Golden Ratio (phi)</th>
        </tr><tr>
          <td>/phi/[number of digits]</td>
          <td>
            <p>Returns the number phi, to the specified number of places after the decimal.</p>

            <span class="label label-info">Examples</span>
            <p class="examples">
              <a href="/phi/100">http://api.arithmophile.com/phi/100</a> <span class="explanation">Returns phi to 100 decimal places.</span><br/>
            </p>
          </td>
        </tr><tr>
          <td>/phi/powers(/[maximum power])</td>
          <td>
            <p>Returns the powers of phi, up to the indicated maximum.</p>

            <span class="label label-info">Examples</span>
            <p class="examples">
              <a href="/phi/powers/5">http://api.arithmophile.com/phi/powers/5</a> <span class="explanation">Returns the powers of phi, up to phi^5.</span><br/>
            </p>
          </td>
        </tr><tr>
          <th colspan="2">Prime Numbers</th>
        </tr><tr>
          <td>/p/upto/[maximum]</td>
          <td>
            <p>Returns a list of the prime numbers less than or equal to specified maximum.</p>

            <span class="label label-info">Examples</span>
            <p class="examples">
              <a href="/p/upto/100">http://api.arithmophile.com/p/upto/100</a> <span class="explanation">Returns the prime numbers less than or equal to 100.</span><br/>
            </p>
          </td>
        </tr><tr>
          <td>/p/[between a]/[and b]</td>
          <td>
            <p>Returns a list of the prime numbers between the two specified.</p>

            <span class="label label-info">Examples</span>
            <p class="examples">
              <a href="/p/10/20">http://api.arithmophile.com/p/10/20</a> <span class="explanation">Returns the prime numbers between 10 an 20, which are 11, 13, 17, 19.</span><br/>
            </p>
          </td>
        </tr><tr>
          <td>/p/[number]</td>
          <td>
            <p>Indicate whether the number is prime.  Return its factors if composite.</p>

            <span class="label label-info">Examples</span>
            <p class="examples">
              <a href="/p/5">http://api.arithmophile.com/p/10</a> <span class="explanation">Returns 2 and 5 as the prime factors of 10.</span><br/>
              <a href="/p/5">http://api.arithmophile.com/p/5</a> <span class="explanation">Indicates that 5 is a prime number.</span><br/>
            </p>
          </td>
        </tr>
      </table>

      <p>Code at <a href="https://github.com/arithmophile/number-functions-api">https://github.com/arithmophile/number-functions-api</a></p>
    </div>
  </div>
</div>
</body>
</html>

