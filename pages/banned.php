<div class="flex justify-center p-2">
	You were banned by <?php echo $response['ban']['name']; ?> for <?php echo $response['ban']['reason']; ?>. The restriction expires <?php echo ($response['ban']['expire'] == -1) ? 'never' : makeDate($response['ban']['expire']); ?>.
</div>