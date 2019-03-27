<h1>Slow Query Log</h1>
<table class='wp-list-table widefat fixed striped fll_ip_list' width='500' cellspacing='0' cellpadding='5'>
    <thead>
        <th class="manage-column" width="130">Start Time</th>
        <th class="manage-column" width="75">Query Time</th>
        <th class="manage-column">SQL</th>
    </thead>
    <tbody>
    <?php
    if ( !$queries ):
        ?><tr><td colspan='3'>No queries logged yet.</td></tr><?php
    else:
        foreach ( $queries as $query ):
            ?>
            <tr>
                <td><?= $query['start_time'] ?></td>
                <td><?= $query['query_time'] ?></td>
                <td><?= SqlFormatter::format($query['sql_text']) ?></td>
            </tr>
        <?php
        endforeach;
    endif;
    ?>
    </tbody>
    <tfoot>
        <th class="manage-column">Start Time</th>
        <th class="manage-column">Query Time</th>
        <th class="manage-column">SQL</th>
    </tfoot>
</table>