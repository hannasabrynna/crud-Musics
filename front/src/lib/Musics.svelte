<script>
  import { currentUser, musicas, addMusicas, removeMusicas } from "../stores";

  const form = {
    name:"",
    artista:"",
    album:"",
    genero:"",
  };

  function handleForm() {
    addMusicas(form.name,form.artista, form.album, form.genero, $currentUser.ID)

    form.name = '';
    form.artista = '';
    form.album = '';
    form.genero= '';

  }

  function remove(ID) {
    removeMusicas(ID, $currentUser.ID)

  }
</script>

{#if $currentUser}
  <div>
    <h2>Musics</h2>
    {#each $musicas as prod}
        <div>{prod.NOME},{prod.ARTISTA} ,{prod.ALBUM}, {prod.GENERO} <a href="#" on:click|preventDefault={() => remove(prod.ID)}>Remover</a> </div>
    {/each}
    <form on:submit|preventDefault={handleForm}>
      <fieldset> 
        <legend>Add your musics below:</legend>
        <input
          type="text"
          name="name"
          bind:value={form.name}
          placeholder="Nome da musica"
          required
        />
        <input
          type="text"
          name="artista"
          bind:value={form.artista}
          placeholder="Nome do artista"
          required
        />
        <input
          type="text"
          name="album"
          bind:value={form.album}
          placeholder="Nome do album"
          required
        />
        <input
          type="text"
          name="genero"
          bind:value={form.genero}
          placeholder="Nome do genero"
          required
        />
        <button>Adicionar</button>
      </fieldset>
    </form>
  </div>
{/if}
