const tabs = document.getElementById('tabs');
const activeTab = document.getElementById('active-users');
const archivedTab = document.getElementById('archived-users');
const passResetTab = document.getElementById('pass-reset-request');
const searchButton = document.getElementById('searchButton');
const searchResultsTab = document.getElementById('search-results');
const searchResultsBody = document.getElementById('search-results-body');
const resultsMessage = document.getElementById('resultsMessage');

searchButton.addEventListener('click', () => {
    event.preventDefault();

    //hide the tabs and three table then show search table
    tabs.classList.add('hidden');
    activeTab.classList.add('hidden');
    archivedTab.classList.add('hidden');
    passResetTab.classList.add('hidden');
    searchResultsTab.classList.remove('hidden');
});




// document.getElementById('searchButton').addEventListener('click', () => {
//     event.preventDefault();

//     const input = document.getElementById('searchInput').value.toLowerCase();
//     const tabs = document.getElementById('tabs');
//     const activeTab = document.getElementById('active-users');
//     const archivedTab = document.getElementById('archived-users');
//     const passResetTab = document.getElementById('pass-reset-request');
//     const searchResultsTab = document.getElementById('search-results');
//     const searchResultsBody = document.getElementById('search-results-body');
//     const resultsMessage = document.getElementById('resultsMessage');

//     tabs.classList.add('hidden');
//     activeTab.classList.add('hidden');
//     archivedTab.classList.add('hidden');
//     passResetTab.classList.add('hidden');
//     searchResultsTab.classList.remove('hidden');

//     resultsMessage.textContent = '';
//     // searchResultsBody.innerHTML = '';

//     //convert $allUser to json
//     let allUserJson = JSON.stringify(@json($allUser));

//     const filteredUsers = @json($allUser).filter((user) => {
//         return (
//             user.id.toLowerCase().includes(input) ||
//             user.fullName.toLowerCase().includes(input) ||
//             user.username.toLowerCase().includes(input) ||
//             user.dateCreated.toLowerCase().includes(input) ||
//             user.role.toLowerCase().includes(input) ||
//             user.status.toLowerCase().includes(input)
//         );
//     });


//     // searchResultsBody.innerHTML = filteredUsers;
//     console.log(allUserJson);



//     if (filteredUsers.length === 0) {
//         resultsMessage.textContent = 'No results found.';
//         return;
//     }

//     filteredUsers.forEach((user) => {
//         const row = document.createElement('tr');
//         row.innerHTML = `
//             <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">${user.id}</td>
//             <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">${user.fullName}</td>
//             <td class="text-left px-6 py-3">${user.username}</td>
//             <td class="text-left px-6 py-3">${user.dateCreated}</td>
//             <td class="text-left px-6 py-3">${user.role}</td>
//             <td class="text-left px-6 py-4">${user.status}</td>
//         `;
//         searchResultsBody.appendChild(row);
//     });
// });
  




  
  



  