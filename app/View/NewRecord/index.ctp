
<div class="row-fluid">
<table class="table table-bordered" id="table_records">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>	
        </tr>
    </thead>
    <tbody>
        <?php foreach($records as $record):?>
        <tr>
            <td><?php echo $record['Record']['id']?></td>
            <td><?php echo $record['Record']['name']?></td>
        </tr>	
        <?php endforeach;?>
    </tbody>
</table>
</div>
echo $this->Paginator->numbers();

// Shows the next and previous links
echo $this->Paginator->prev(
  '« Previous',
  null,
  null,
  array('class' => 'disabled')
);
echo $this->Paginator->next(
  'Next »',
  null,
  null,
  array('class' => 'disabled')
);

// prints X of Y, where X is current page and Y is number of pages
echo $this->Paginator->counter();
