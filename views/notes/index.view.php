<?php require base_path('views/partials/head.php');

require base_path('views/partials/nav.php');

 require base_path('views/partials/banner.php');
 ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note): ?>
                <li>
                    <a href="/note?id=<?php echo $note['id'] ?>" class=" text-blue-500 hover:underline">
                        <?= htmlspecialchars ($note['body']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <p class="mt-6">
            <a href="/notes/create" class="font-bold text-indigo-400 hover:underline">Create A Note</a>
        </p>
    </div>
</main>
<?php require base_path('views/partials/footer.php'); ?>
