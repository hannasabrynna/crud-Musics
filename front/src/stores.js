import { writable } from "svelte/store";

export const currentPage = writable('home');
export const users = writable([]);
export const currentUser = writable(null);
export const musicas = writable([]);

users.subscribe(v => {
    const user = v.at(-1);
    
    if (!user) return;

    const formData = new FormData();
    formData.append('username', user.username);
    formData.append('password', user.pw);
    formData.append('email', user.email);

    fetch('http://localhost:8000/add-user.php', {
        method: 'post',
        body: formData
    }); // non blocking
    console.log('oi');
})

export function addMusicas(name, artista, album, genero, USERS_ID) {
    const formData = new FormData();

    formData.append('name', name);
    formData.append('artista', artista);
    formData.append('album', album);
    formData.append('genero', genero);
    formData.append('USERS_ID', USERS_ID);

    fetch('http://localhost:8000/add-musics.php', {
        method: 'post',
        body: formData
    });
    console.log('oi,oi')

    loadMusicas(USERS_ID)
}

export async function removeMusicas(id, USERS_ID) {
    await fetch('http://localhost:8000/remove-musics.php?id=' + id, {
        method: 'get'
    });
    loadMusicas(USERS_ID)
}

async function loadMusicas(USERS_ID) {
    // console.log('deve carregar os produtos do usuário ' + user_id)
    const response = await fetch('http://localhost:8000/get-musics.php?USERS_ID'+USERS_ID, {
        method: 'get'
    });
    

    const data = await response.json();
    musicas.set(data);
}

export const login = async (username, pw) => {
    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', pw);
   
    const response = await fetch('http://localhost:8000/login.php', {
        method: 'post',
        body: formData
    });
    if (!response.ok) {
        alert('usuário ou senha incorretos');
        return;
    }
    const data = await response.json();
    currentUser.set(data);
    loadMusicas(data.id)
}