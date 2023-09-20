document.addEventListener("DOMContentLoaded", function () {
  function generateGraveInputs() {
    const sectionNumberInput = document.getElementById("sectionNumber");
    const gravePerSecContainer = document.getElementById(
      "gravePerSecContainer"
    );

    // Clear any previously generated inputs
    gravePerSecContainer.innerHTML = "";

    // Get the number of sections entered by the user
    const numSections = parseInt(sectionNumberInput.value);

    // Generate input fields based on the user's input
    for (let i = 0; i < numSections; i++) {
      const inputDiv = document.createElement("div");
      inputDiv.className = "mb-3";
      inputDiv.innerHTML = `
        <label for="GravesInSection${i + 1}" class="form-label">Graves in Section ${
        i + 1
        }</label>
        <input type="number" class="form-control" id="GravesInSection${
        i + 1
        }" name="numberOfGraves" placeholder="Enter Number of Graves for Section ${
        i + 1
        }" />
      `;
      gravePerSecContainer.appendChild(inputDiv);
    }
  }

  // Attach the generateGraveInputs function to the input event of sectionNumber
  const sectionNumberInput = document.getElementById("sectionNumber");
  sectionNumberInput.addEventListener("input", generateGraveInputs);

  // Add an event listener for form submission
  document.querySelector("form").addEventListener("submit", function (event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Get the number of sections entered by the user
    const numSections = parseInt(
      document.getElementById("sectionNumber").value
    );

    // Initialize a variable to store the total
    let totalGraves = 0;

    // Iterate through the input fields for each section
    for (let i = 1; i <= numSections; i++) {
      // Get the user's input for graves in this section
      const gravesInput = document.getElementById(`GravesInSection${i}`);
      const gravesInSection = parseInt(gravesInput.value);

      // Check if the input is a valid number
      if (!isNaN(gravesInSection)) {
        // Add the number of graves in this section to the total
        totalGraves += gravesInSection;
      }
    }

    // Set the calculated total as the value for the numberOfGraves input field
    const numberOfGravesInput = document.getElementById("numberOfGraves");
    if (numberOfGravesInput) {
      numberOfGravesInput.value = totalGraves;
    }

    // Now, you can submit the form
    this.submit();
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // Function to populate the select element with region options
  function populateRegionSelect(regionData) {
      const regionSelect = document.getElementById('regionSelect');
      regionSelect.innerHTML = '<option selected>Select Region</option>'; // Clear existing options

      regionData.forEach(regionName => {
          const option = document.createElement('option');
          option.value = regionName;
          option.textContent = regionName;
          regionSelect.appendChild(option);
      });
  }

  // Fetch region data from PHP using AJAX
  fetch('../php/addGraveyardFetch.php')
      .then(response => response.json())
      .then(regionData => {
          // Call the function to populate the select element
          populateRegionSelect(regionData);
      })
      .catch(error => {
          console.error('Error fetching region names:', error);
      });

  // Additional JavaScript code for dynamic input generation
});



// Function to fetch towns based on the selected region and populate the townSelect dropdown
function populateTownSelect(selectedRegion) {
  fetch('../php/fetchTowns.php?region=' + selectedRegion)
      .then(response => response.json())
      .then(data => {
          const townSelect = document.getElementById('townSelect');
          // Clear existing options
          townSelect.innerHTML = '';
          // Add a default option
          const defaultOption = document.createElement('option');
          defaultOption.value = '';
          defaultOption.textContent = 'Select Town';
          townSelect.appendChild(defaultOption);
          // Add towns based on the selected region
          data.forEach(townName => {
              const option = document.createElement('option');
              option.value = townName;
              option.textContent = townName;
              townSelect.appendChild(option);
          });
      })
      .catch(error => {
          console.error('Error fetching towns:', error);
      });
}

// Add an event listener to the regionSelect dropdown to trigger population of townSelect
const regionSelect = document.getElementById('regionSelect');
regionSelect.addEventListener('change', function () {
  const selectedRegion = regionSelect.value;
  populateTownSelect(selectedRegion);
});
