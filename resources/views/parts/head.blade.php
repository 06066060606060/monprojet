<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel</title>
@vite('resources/css/app.css')
<script> myToken =  <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>