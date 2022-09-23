<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GeoGraff</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite('resources/css/app.css')
@vite('resources/js/leaflet.js')
<script>
    myToken = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
</script>