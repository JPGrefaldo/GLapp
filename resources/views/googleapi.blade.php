<!DOCTYPE html>
<html>
  <head>
    <title>Place Autocomplete Address Form</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
        <link type="text/css" rel="stylesheet" href="./css/google.css" />
  </head>

  <body>
    <div id="locationField">
      <input id="autocomplete" placeholder="Enter your address"
             onFocus="geolocate()" type="text"></input>
    </div>

    <table id="address">
      <tr>
        <td class="label">Street address</td>
        <td class="slimField"><input class="field street_number" id=""
              disabled="true"></input></td>
        <td class="wideField" colspan="2"><input class="field route" id=""
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">Town/Barangay</td>
        <td class="wideField" colspan="3"><input class="field administrative_area_level_5 neighborhood" id=""
              disabled="true"></input>
        </td>
      </tr>
      <tr>
        <td class="label">City/Municipality</td>
        <!-- Note: Selection of address components in this example is typical.
             You may need to adjust it for the locations relevant to your app. See
             https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
        -->
        <td class="wideField" colspan="3"><input class="field locality" id=""
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">Province</td>
        <td class="slimField"><input class="field administrative_area_level_2 administrative_area_level_1"
              id="" disabled="true"></input></td>
        <td class="label">Zip code</td>
        <td class="wideField"><input class="field postal_code" id=""
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">Country</td>
        <td class="wideField" colspan="3"><input class="field country"
              id="" disabled="true"></input></td>
      </tr>
    </table>
    <script src="./js/google.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVS0CN-Ez85eOLGEh7d113v9LE9ZzDses&libraries=places&callback=initAutocomplete"
        async defer></script>
  </body>
</html>