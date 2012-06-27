<!DOCTYPE html>
<html>
<head>
  <title>Arithmophile API</title>
  <link rel="styleheet" href="/bootstrap/css/bootstrap.css" />
</head>
<body>
<div class="row">
  <div class="span12">

<table>
  <tr>
    <td colspan="2">Decimal Calculator</td>
  </tr><tr>
    <td>/dc/[denominator](/[numerator])</td>
    <td>Specify denominator and optional numerator</td>
  </tr><tr>
    <td colspan="2">Triangular Numbers</td>
  </tr><tr>
    <td>/tri/upto/[nth]</td>
    <td>List the triangular numbers, up to the nth.  (e.g., If nth is 3, list includes 1, 3, 6.)</td>
  </tr><tr>
    <td>/tri/[from nth]/to/[to nth]</td>
    <td>List the triangular numbers within the specified range.</td>
  </tr><tr>
    <td>/tri/test/[number]</td>
    <td>Check the specified number to determine whether it is triangular.</td>
  </tr><tr>
    <td colspan="2">Golden Ratio (phi)</td>
  </tr><tr>
    <td>/phi/[number of digits]</td>
    <td>Returns the number phi, to the specified number of places after the decimal.</td>
  </tr><tr>
    <td>/phi/powers(/[maximum power])</td>
    <td>Returns the powers of phi, up to the indicated maximum.</td>
  </tr><tr>
    <td colspan="2">Prime Numbers</td>
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

    </div>
</div>
</body>
</html>

