<?php

require_once 'vendor/autoload.php';
require_once 'core/bootstrap.php';

use App\Core\App;

// A copy of Artisan

$templates = [
	"controller" => "<?php

namespace App\Controllers;

class {{Name}}
{
	public function master()
	{
		return view('index');
	}
}",
	"model" => "<?php

namespace App\Models;

class {{Name}}
{
	// Code here
}",
	"view" => "<?php require('partials/head.php'); ?>

<h1>Empty View</h1>

<?php require('partials/footer.php'); ?>",
	"partial" => "<?php use App\Core\App; ?>",
	"migration" => "<?php

namespace App\Migrations;

class {{Name}}
{
	/**
	 * Run the migration.
	 * @return String A sql query
	 */

	public function up()
	{
		return \"\";
	}

	/**
	 * Reverse the migration.
	 * @return String A sql query
	 */

	public function down()
	{
		return \"\";
	}
}"
];

if ($argv[1] == "controller") {
	// Make a controller
	file_put_contents("app/controllers/" . $argv[2] . ".php", str_replace("{{Name}}", $argv[2], $templates["controller"]));
} else if ($argv[1] == "model") {
	// Make a model
	file_put_contents("app/models/" . $argv[2] . ".php", str_replace("{{Name}}", $argv[2], $templates["model"]));
} else if ($argv[1] == "view") {
	// Make a view
	file_put_contents("app/views/" . $argv[2] . ".view.php", $templates["view"]);
} else if ($argv[1] == "partial") {
	// Make a partial
	file_put_contents("app/views/partials/" . $argv[2] . ".php", $templates["partial"]);
} else if ($argv[1] == "migration") {
	// Make a partial
	file_put_contents("app/migrations/" . $argv[2] . ".php", str_replace("{{Name}}", $argv[2], $templates["migration"]));
} else if ($argv[1] == "blade") {
	// Compile a Blade Template
	$template = file_get_contents("app/blade/{$argv[2]}.blade.php");
	$template = str_replace("{!! ", "<?= ", $template);
	$template = str_replace(" !!}", " ?>", $template);
	$template = str_replace("{{ ", "<?= htmlspecialchars(", $template);
	$template = str_replace(" }}", ") ?>", $template);
	$template = str_replace("@php", "<?php", $template);
	$template = str_replace("@endphp", "?>", $template);
	$template = str_replace("@endif", "<?php endif; ?>", $template);
	$template = str_replace("@endunless", "<?php endif; ?>", $template);
	$template = str_replace("@endforeach", "<?php endforeach; ?>", $template);
	$template = preg_replace("/@extends\('([a-z]*)'\)/si", "<?php require_once 'partials/$1.php'; ?>", $template);
	$template = preg_replace("/@if \(([^\n]*)\)/si", "<?php if ($1) : ?>", $template);
	$template = preg_replace("/@for \(([^\n]*)\)/si", "<?php for ($1) : ?>", $template);
	$template = preg_replace("/@while \(([^\n]*)\)/si", "<?php while ($1) : ?>", $template);
	$template = preg_replace("/@dump\(([^\n]*)\)/si", "<?php dump($1) ?>", $template);
	$template = preg_replace("/@dd\(([^\n]*)\)/si", "<?php dd($1) ?>", $template);
	$template = preg_replace("/@method\(\"([^\n]*)\"\)/si", "<input type='hidden' name='pzplphp-method' value='$1'>", $template);
	$template = preg_replace("/@isset\(([^\n]*)\)/si", "<?php if (isset($1) && !empty($1)) : ?>", $template);
	$template = preg_replace("/@empty\(([^\n]*)\)/si", "<?php if (!isset($1) || isset($1)) : ?>", $template);
	$template = preg_replace("/@unless \(([^\n]*)\)/si", "<?php if (!$1) : ?>", $template);
	$template = preg_replace("/@elseif \(([^\n]*)\)/si", "<?php elseif ($1) : ?>", $template);
	$template = preg_replace("/@foreach \(([^)-]*)\)/si", "<?php foreach ($1) : ?>", $template);
	$template = preg_replace("/@json\(([^\n]*)\)/mu", "<?= json_encode($1) ?>", $template);
	$template = preg_replace("/@else\n/mu", "<?php else : ?>\n", $template);
	$template = preg_replace("/@endisset\n/mu", "<?php endif; ?>\n", $template);
	$template = preg_replace("/@endempty\n/mu", "<?php endif; ?>\n", $template);
	$template = preg_replace("/@production\n/mu", "<?php if (\App\Core\App::get('config')['production']) : ?>\n", $template);
	$template = preg_replace("/@endproduction\n/mu", "<?php endif; ?>\n", $template);
	$template = preg_replace("/@endfor\n/mu", "<?php endfor; ?>\n", $template);
	$template = preg_replace("/@endwhile\n/mu", "<?php endwhile; ?>\n", $template);
	$template = preg_replace("/@break\n/mu", "<?php break; ?>\n", $template);
	$template = preg_replace("/@continue\n/mu", "<?php continue; ?>\n", $template);
	$template = preg_replace("/{{-- [^\n]* --}}/mu", "", $template);
	$template = preg_replace("/@csrf\n/mu", "<input type='hidden' name='pzplphp-csrf-token' value='<?= \$_SESSION['pzplphp-csrf-token'] ?>'>\n", $template);
	file_put_contents("app/views/{$argv[2]}.view.php", "<?php /* Compiled from a Blade Template on " . Date("d-m-Y H:i:s") . " */ ?>\n" . $template);
	echo "pzplPHP Artisan >>> Compilation successful.\n";
} else if ($argv[1] == "tinker") {
	for ($i = 0; $i < 10; $i++) {
		$line = readline("pzplPHP Tinker >>> ");
		if ($line == "exit") {
			die("=> Bye!\n");
		}
		if ($line == "") {
			continue;
		}
		file_put_contents(".tinker-temp.php", "<?php require_once 'vendor/autoload.php';
require_once 'core/bootstrap.php';\nreturn " . $line);
		try {
			$data = require ".tinker-temp.php";
		} catch (\Throwable $th) {
			$data = $th;
		}
		echo "=> ";
		var_dump($data);
		echo "\n";
		$i--;
	}
} else if ($argv[1] == "migrate:up") {
	$namespaced = "App\\Migrations\\{$argv[2]}";
	$controller = new $namespaced;
	$migration = $controller->up();
	App::get("database")->sqlNoFetch($migration);
	echo "pzplPHP Artisan >>> Migration completed.\n";
} else if ($argv[1] == "migrate:down") {
	$namespaced = "App\\Migrations\\{$argv[2]}";
	$controller = new $namespaced;
	$migration = $controller->down();
	App::get("database")->sqlNoFetch($migration);
	echo "pzplPHP Artisan >>> Migration completed.\n";
} else if ($argv[1] == "migrate") {
	echo "pzplPHP Artisan >>> Avalible options: migrate:up, migrate:down\n";
}
