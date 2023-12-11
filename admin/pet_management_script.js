function addPet() {
    var petType = document.getElementById("pet-type").value;
    var petSex = document.getElementById("pet-sex").value;
    var petBreed = document.getElementById("pet-breed").value;
    var petAge = document.getElementById("pet-age").value;
    var petWeight = document.getElementById("pet-weight").value;
    var petImageInput = document.getElementById("pet-image");
    var petImage = petImageInput.files[0]; 

    if (petType && petSex && petBreed && petAge && petWeight && petImage) {
        var petContainer = document.getElementById("pet-container");
        var petBox = document.createElement("div");
        petBox.className = "pet-box";

        var imagePreview = document.createElement("img");
        imagePreview.src = URL.createObjectURL(petImage);
        imagePreview.alt = petType;
        imagePreview.style.maxWidth = "100%";
        petBox.appendChild(imagePreview);

        petBox.innerHTML += `<p><strong>Pet Type:</strong> ${petType}</p>
                            <p><strong>Sex:</strong> ${petSex}</p>
                            <p><strong>Breed:</strong> ${petBreed}</p>
                            <p><strong>Age:</strong> ${petAge} years</p>
                            <p><strong>Weight:</strong> ${petWeight} kg</p>
                            <button class="edit-btn" onclick="editPet(this)">Edit</button>
                            <button onclick="deletePet(this)">Delete</button>`;
        petContainer.appendChild(petBox);

       
        document.getElementById("pet-type").value = "";
        document.getElementById("pet-sex").value = "";
        document.getElementById("pet-breed").value = "";
        document.getElementById("pet-age").value = "";
        document.getElementById("pet-weight").value = "";
        petImageInput.value = ""; 

    
        URL.revokeObjectURL(imagePreview.src);
    }
}

function editPet(button) {
    var petBox = button.parentElement;
    var petInfo = petBox.querySelectorAll("p");

   
    document.getElementById("pet-type").value = petInfo[0].textContent.split(":")[1].trim();
    document.getElementById("pet-sex").value = petInfo[1].textContent.split(":")[1].trim();
    document.getElementById("pet-breed").value = petInfo[2].textContent.split(":")[1].trim();
    document.getElementById("pet-age").value = petInfo[3].textContent.split(":")[1].trim().replace(" years", "");
    document.getElementById("pet-weight").value = petInfo[4].textContent.split(":")[1].trim().replace(" kg", "");
    document.getElementById("pet-image").value = "";
    
    petBox.remove();
}

function saveChanges() {
    
    var petBoxes = document.querySelectorAll(".pet-box");

   
    petBoxes.forEach(function(petBox) {
        
        var petType = petBox.querySelector("p:nth-child(1)").innerHTML.split("<strong>: </strong>")[1];
        var petSex = petBox.querySelector("p:nth-child(2)").innerHTML.split("<strong>: </strong>")[1];
        var petBreed = petBox.querySelector("p:nth-child(3)").innerHTML.split("<strong>: </strong>")[1];
        var petAge = petBox.querySelector("p:nth-child(4)").innerHTML.split("<strong>: </strong>")[1].replace(" years", "");
        var petWeight = petBox.querySelector("p:nth-child(5)").innerHTML.split("<strong>: </strong>")[1].replace(" kg",);

        
        console.log("Updated Pet Details:");
        console.log("Pet Type: " + petType);
        console.log("Sex: " + petSex);
        console.log("Breed: " + petBreed);
        console.log("Age: " + petAge);
        console.log("Weight: " + petWeight);
    });

   
    alert("Changes saved successfully!");
}
