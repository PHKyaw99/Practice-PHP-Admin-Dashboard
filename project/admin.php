<?php
include('./vendor/autoload.php');

use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL());
$users = $table->getAll();

$auth = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/profile_style.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #222D32;">
    <nav class="navbar navbar-expand" style="background: #1A2226;">
        <div class="container mx-auto w-75">
            <a href="#" class="navbar navbar-brand text-white">ADMIN PAGE</a>
            <ul class="navbar nav nav-group">
                <li class="nav-item">
                    <a href="./profile.php" class="btn btn-outline-primary me-2">PROFILE</a>
                    <a href="./_actions/logout.php" class="btn btn-outline-danger">LOGOUT</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="mx-auto my-4 w-75"  style="background-color: #1A2226;">
        <table class="text-white" style="width: 100%;">
            <tr>
                <th class="text-center">ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th class="text-center">Role</th>
                <th class="text-center">ACTIONS</th>
            </tr>
            <?php foreach ( $users as $user) : ?>
                <tr>
                    <td class="text-center"><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td class="text-center">
                        <?php if($user->value === 1) : ?>
                            <span class="badge bg-secondary">
                                <?= $user->role ?>
                            </span>
                        <?php elseif($user->value === 2) : ?>
                            <span class="badge bg-primary">
                                <?= $user->role ?>
                            </span>
                        <?php else : ?>
                            <span class="badge bg-success">
                                <?= $user->role ?>
                            </span>
                        <?php endif ?>
                    </td>
                    <td class="text-center">
                        <?php if ($auth->value > 1) : ?>
							<div class="btn-group dropdown">
								<a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
									Change Role
								</a>
								<div class="dropdown-menu dropdown-menu-dark">
									<a href="_actions/role.php?id=<?= $user->id ?>&role=1" class="dropdown-item">User</a>
									<a href="_actions/role.php?id=<?= $user->id ?>&role=2" class="dropdown-item">Manager</a>
									<a href="_actions/role.php?id=<?= $user->id ?>&role=3" class="dropdown-item">Admin</a>
								</div>

								<?php if ($user->suspended) : ?>
									<a href="_actions/unsuspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-danger">Banned</a>
								<?php else : ?>
									<a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-success">Active</a>
								<?php endif ?>

								<?php if ($user->id !== $auth->id) : ?>
									<a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-danger" onClick="return confirm('Are you sure?')">Delete</a>
								<?php endif ?>
							</div>
						<?php else : ?>
							###
						<?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>