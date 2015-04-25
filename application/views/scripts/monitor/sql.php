<!-- style>
#sqlme-sql-monitor-content {
	position: fixed;
	clear: both;
	width: 100%;
	height: 300px;
	bottom: 0;
	background-color: red;
	z-index: 999;
}
</style -->
<div id="sqlme-sql-monitor-content">
    <table width="100%" class="sqlme-table">
        <tr>
            <th>#</th>
            <th align="left">Query</th>
        </tr>
        <?php foreach ($this->queries as $query): ?>
        <tr>
            <td align="center"><?php echo $query['Id'] ?></td>
            <td align="left"><?php echo $query['Info'] ?></td>
        </tr>
        <?php endforeach ?>
    </table>
</div>
<script>
jQuery(document).ready(function() {
    jQuery("#sqlme-sql-monitor-content").dialog({
        dialogClass: "no-close",
        buttons: [{
            text: "OK",
            click: function() {
                jQuery( this ).dialog( "close" );
            }
        }]
    });
});
</script>