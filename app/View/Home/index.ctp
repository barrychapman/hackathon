<ul id="UserList" title="Select Login" selected="true">
    <li class="group">Users</li>

<?php foreach ($users as $user): ?>
    <li style="float: left; clear: left; width: 100%;">
        <a style="display: block; float: left; width: 100%;" href="/user/select/<?php echo $user['User']['id']; ?>">
            <img width="32" height="32" style="float: left; width: 32px; height: 32px;" alt="" src="/img/muppets/<?php echo $user['User']['icon']; ?>">
            <span style="display: inline-block; float: left; padding: 4px 0 4px 10px;"><?php echo $user['User']['name']; ?></span>
        </a>
    </li>


<?php endforeach; ?>
</ul>