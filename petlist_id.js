document.addEventListener('DOMContentLoaded', function () {
  
  const petData = [
    { name: 'Fluffy', image: 'fluffy.jpg', description: 'A cute and friendly pet.' },
    { name: 'Buddy', image: 'buddy.jpg', description: 'Loves to play and go on walks.' },
    
  ];

  const petListingsContainer = document.getElementById('pet-listings');

 
  petData.forEach(pet => {
    const petCard = document.createElement('div');
    petCard.classList.add('pet-card');

    const petImage = document.createElement('img');
    petImage.classList.add('pet-image');
    petImage.src = `images/${pet.image}`; 
    petImage.alt = pet.name;

    const petName = document.createElement('h2');
    petName.textContent = pet.name;

    const petDescription = document.createElement('p');
    petDescription.textContent = pet.description;

    const adoptButton = document.createElement('button');
    adoptButton.classList.add('adopt-button');
    adoptButton.textContent = 'Adopt';

    petCard.appendChild(petImage);
    petCard.appendChild(petName);
    petCard.appendChild(petDescription);
    petCard.appendChild(adoptButton);

    petListingsContainer.appendChild(petCard);
  });

});
