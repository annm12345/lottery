<?php
require('top.php');
?>


  <style>
    .result_container{
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-bottom:2rem;
    }
    .main-heading {
      font-size: 16px; /* Adjust the font size */
      color: #333; /* Adjust the text color */
      margin-bottom: 20px; /* Add some space below the heading */
    }


    .header-search-container {
      flex-grow: 1;
    }

    .search-container-small {
      flex-basis: 30%; /* Set width to 30% for small search bar */
    }

    .search-container-large {
      flex-basis: 70%; /* Set width to 70% for large search bar */
    }

    .search-container-small:not(:last-child) {
      margin-right: 20px; /* Add gap between search bars */
    }

    .search-field {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .search-btn {
      background-color: green;
      color: white;
      border: none;
      padding: 10px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      cursor: pointer;
    }
    .result_container {
        overflow-x: auto;
        border:1px solid gold;
        margin: 2rem 15rem;
        border-radius:5px;
        display:block; /* Enable horizontal scrolling on smaller screens */
    }
    .cash-container{
      margin: 2rem 15rem;
    }

    .result_container table {
        width: 100%; /* Table fills the container */
        border-collapse: collapse; /* Remove border spacing */
    }

    .result_container table td {
        padding: 4px;
        text-align: center;
        margin:auto;
    }
    .result_container table th {
        text-align: center;
    }
    .result_container table span {
      align-items:center;
      text-align: center;
      background: gold; /* Set background color to light gold */
      border-radius: 50%; /* Make the background circular */
      width: 40px; /* Set fixed width for circular cells */
      height: 40px; /* Set fixed height for circular cells */
      line-height: 40px; 
      font-weight:600;
    }


    /* Hide table borders */
    .result_container table,
    .result_container table td,
    .result_container table th {
        border: none;
    }
    .cash-container {
      display: flex;
      flex-direction: column;
      color:#fff;
      background-color: #fff; /* Set background color */
      border: 1px solid #ccc; /* Add border */
      border-radius: 5px; /* Add border radius */
      padding: 10px; /* Add padding */
      max-width: 500px; /* Set max-width if needed */
    }

    .amount,
    .total {
      width:100%;
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px; /* Add margin between sections */
    }

    .cash-container span {
      font-size: 16px; /* Set font size */
      font-weight: bold; /* Set font weight */
    }

    .cash-container span:first-child {
      color: #000; /* Set color for labels */
    }

    .cash-container span:last-child {
      color: #000; /* Set color for values */
    }
    .btn-primary {
      background-color: gold;
      text-align:center;
      color: white; /* Set text color */
      padding: 10px 20px; /* Add padding */
      border: none; /* Remove border */
      border-radius: 5px; /* Add border radius */
      cursor: pointer; /* Add cursor pointer */
      font-size: 16px; /* Set font size */
      font-weight: bold; /* Set font weight */
      text-transform: uppercase; /* Convert text to uppercase */
      transition: background-color 0.3s; /* Add transition effect */
    }

    .btn-primary:hover {
      background-color: goldenrod; /* Change background color on hover */
    }


    /* Responsive styles for smaller screens */
   

    /* Media query for mobile devices */
    @media (max-width: 768px) {
      .container {
        display: grid; 
        grid-template-columns:40% 60%;/* Display search bars vertically on mobile */
      }

      .header-search-container {
        flex-basis: auto; /* Reset width for mobile */
        margin-right: 0; /* Remove margin */
        margin-bottom: 10px; /* Add space between search bars on mobile */
      }
      .result_container {
       
          margin: 2rem 1rem; /* Enable horizontal scrolling on smaller screens */
      }
      .cash-container{
        margin: 2rem 1rem;
      }
      .result_container table {
            overflow-x: scroll; /* Enable horizontal scrolling */
        }
    }



  </style>
  <div class="banner">
    <div class="header-main">
      
      <div class="container">
        <div class="header-search-container search-container-small">
          <input type="search" name="search" class="search-field" placeholder="အက္ခရာ">
          <button class="search-btn">
            <ion-icon name="search-outline"></ion-icon>
          </button>
        </div>
        <div class="header-search-container search-container-large">
          <input type="search" name="search" class="search-field" placeholder="နံပါတ်">
          <button class="search-btn">
            <ion-icon name="search-outline"></ion-icon>
          </button>
        </div>
      </div>

      <div class="result_container">
        <div class="header-table" style="margin:2rem;border-bottom:1px dashed gold">
          <p>၅၆ ကြိမ်မြောက် ထီလက်မှတ်</p>
          <span>01/4/2024 will open the result</span>
        </div>
        <table>
          <tr>
            <th>အက္ခရာ</th>
            <th colspan="6">နံပါတ်</th>
            <th></th>
          </tr>
          <tr>
            <td><span>က</span></td>            
            <td><span>၁</span></td>            
            <td><span>၂</span></td>            
            <td><span>၃</span></td>            
            <td><span>၄</span></td>            
            <td><span>၅</span></td>            
            <td><span>6</span></td> 
            <td>
              <button style="position: relative;">
                <ion-icon name="ticket" style="font-size: 24px;color: gold;"></ion-icon>
                <p class="count" style="position: absolute; top: 0; left: 110%; transform: translateX(-50%); margin-top: -12px; font-weight: bold;">3</p>
              </button>
            </td>

            <td>
              <ion-icon name="add"></ion-icon>              
            </td> 
            <td>
              <ion-icon name="trash-outline"></ion-icon>              
            </td>         
          </tr>
          <tr>
            <td><span>ခ</span></td>            
            <td><span>၁</span></td>            
            <td><span>၂</span></td>            
            <td><span>၃</span></td>            
            <td><span>၄</span></td>            
            <td><span>၅</span></td>            
            <td><span>6</span></td>   
            <td>
              <button style="position: relative;">
                <ion-icon name="ticket" style="font-size: 24px;color: gold;"></ion-icon>
                <p class="count" style="position: absolute; top: 0; left: 110%; transform: translateX(-50%); margin-top: -12px; font-weight: bold;">5</p>
              </button>
            </td>
            <td>
              <ion-icon name="add"></ion-icon>              
            </td> 
            <td>
              <ion-icon name="trash-outline"></ion-icon>              
            </td>         
          </tr>
        </table>
      </div>

      <div class="cash-container">
          <div class="amount"> 
              <span>Total Amount</span>
              <span style="color:green">2000 KS</span>
          </div>
          <div class="total"> 
              <span>Total tickets</span>
              <span>8</span>
          </div>
          
          <a href="#" class="btn-primary"> Buy Ticket</a>
      </div>
    </div>
  </div>



</main>

<!--
    - custom js link
-->
<script src="./assets/js/script.js"></script>

<!--
    - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
