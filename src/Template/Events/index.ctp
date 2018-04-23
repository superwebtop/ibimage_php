<div class="block margin-bottom-sm">
  <div class="title"><strong>My Events</strong></div>
  <div class="table-responsive">
    <table class="table">
      <thead>
      <tr>
        <th>#</th>
        <th>Event Name</th>
        <th>Started</th>
        <th>Ended</th>
        <th>Team A</th>
        <th>Team B</th>
        <th>Division</th>
        <th>Field</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      <?php for ($i = 0; $i < 40; $i++) :?>
      <tr>
        <th scope="row"><?=$i + 1 ?></th>
        <td>2018 Cricket Cup Champion</td>
        <td>2018-12-02 02:00</td>
        <td>2018-04-02 02:00</td>
        <td>Hanao</td>
        <td>Karmen</td>
        <td>19</td>
        <td>Field 23</td>
        <td><a class="btn" href="<?=$this->Url->build(['controller' => 'events','action' => 'edit'])?>">Edit</a>&nbsp;&nbsp;<a class="btn">Delete</a></td>
      </tr>
      <?php endfor;?>

      </tbody>
    </table>
  </div>
</div>