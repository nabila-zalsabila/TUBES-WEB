<nav class="navbar bg-white border-bottom px-3">
    <div class="container-fluid">

        <!-- Left Icon -->
        <button class="btn btn-light d-md-none">
            <i class="bi bi-list"></i>
        </button>

        <!-- Search Box -->
        <form class="d-flex mx-auto" style="max-width: 700px; width: 100%;" method="GET" action="index.php">
            <div class="input-group rounded-pill bg-light shadow-sm px-3 py-1 w-100">
                <span class="input-group-text bg-light border-0">
                    <i class="bi bi-search"></i>
                </span>

                <input type="search" 
                       name="q"
                       class="form-control border-0 bg-light"
                       placeholder="Telusuri postingan..."
                       value="<?= $_GET['q'] ?? '' ?>">
            </div>
        </form>
    </div>
</nav>