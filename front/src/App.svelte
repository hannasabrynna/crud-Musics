<script>
  import Home from "./lib/Home.svelte";
  import Register from "./lib/Register.svelte";
  import Login from "./lib/Login.svelte";
  import Musics from "./lib/Musics.svelte";
  import { currentPage, currentUser } from "./stores";
   

  function changePage(page) {
    $currentPage = page
  }
</script>

<!-- svelte-ignore a11y-click-events-have-key-events -->
<main>
  <h1>CRUD - MUSICS </h1>
  <nav>
    <div on:click={() => changePage("home")}>  <button>Home</button> </div>

    {#if !$currentUser}
      <div on:click={() => changePage("register")}> <button>Resister</button> </div>
      <div on:click={() => changePage("login")}> <button>Login</button> </div>
    {:else}
      <div on:click={() => changePage("musicas")}> <button>Add Musics</button> </div>
      <div on:click={() => ($currentUser = null)}> <button>Logout</button> </div>
    {/if}
  </nav>
  <div>
    {#if $currentPage == "home"}
      <Home />
    {:else if $currentPage == "register"}
      <Register />
    {:else if $currentPage == "musicas"}
      <Musics />
    {:else if $currentPage == "login"}
      <Login />
    {/if}
  </div>
</main>

<style>
  nav {
    display: flex;
    gap: 0.5em;
    justify-content: space-between;
  }
  nav > div {
    border: 1px solid black;
    padding: 0 1em;
    cursor: pointer;
  }
</style>
