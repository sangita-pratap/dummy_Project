<table class="table">
  <thead>
    <tr>
      <th scope="col">Asset Details</th>
    </tr>
  </thead>
  <tbody>
      <?php // print_r($details);  ?>
    <tr>     
      <td>Scheme Name:</td>
      <td>{{ $details['vchSchemeName'] }}</td>     
    </tr>  
    <tr>     
      <td>Scheme Id</td>
      <td>{{ $details['scheme_id'] }}</td>     
    </tr>
    <tr>     
      <td>Asset Id</td>
      <td>{{ $details['asset_id'] }}</td>     
    </tr>
    <tr>     
      <td>Asset No</td>
      <td>{{ $details['asset_no'] }}</td>     
    </tr>
    <tr>     
      <td>Vch Type</td>
      <td>{{ $details['vchType'] }}</td>     
    </tr>
    <tr>     
      <td>Category Name</td>
      <td>{{ $details['categoryName'] }}</td>     
    </tr>
  </tbody>
</table>