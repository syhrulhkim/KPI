<style>
  :root {
    --level-1: #f27c8d;
    --level-2: #FFA500;
    --level-3: #f5cc7f;
    --level-4: #7b9fe0;
    --level-5: #8dccad;
    --black: black;
  }
  
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }
  
  ol {
    list-style: none;
  }
  
  body {
    margin: 50px 0 100px;
    text-align: center;
    font-family: "Inter", sans-serif;
  }
  
  .container {
    max-width: 1000px;
    padding: 0 10px;
    margin: 0 auto;
  }
  
  .rectangle {
    position: relative;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
  }

  .level-1 {
    width: 50%;
    margin: 0 auto 40px;
    background: var(--level-1);
  }

  .level-2-wrapper {
  position: relative;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}
 
.level-2-wrapper::after {
  display: none;
  content: "";
  position: absolute;
  left: -20px;
  bottom: -20px;
  width: calc(100% + 20px);
  height: 2px;
  background: var(--black);
}
 
.level-2-wrapper li {
  position: relative;
}
 
.level-2 {
  width: 70%;
  margin: 0 auto 40px;
  background: var(--level-2);
}
 
.level-2::after {
  display: none;
  content: "";
  position: absolute;
  top: 50%;
  left: 0%;
  transform: translate(-100%, -50%);
  width: 20px;
  height: 2px;
  background: var(--black);
}
.level-3-wrapper {
  position: relative;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-column-gap: 20px;
  width: 90%;
  margin: 0 auto;
}
 
.level-3 {
  margin-bottom: 20px;
  background: var(--level-3);
}
.level-4-wrapper {
  position: relative;
  width: 80%;
  margin-left: auto;
}
 
.level-4-wrapper li + li {
  margin-top: 20px;
}
 
.level-4 {
  font-weight: normal;
  background: var(--level-4);
}
 
@media screen and (max-width: 700px) {    
  .rectangle {
    padding: 20px 10px;
  }
   
  .level-1,
  .level-2 {
    width: 100%;
  }
   
  .level-1 {
    margin-bottom: 20px;
  }
   
  .level-1::before,
  .level-2-wrapper > li::before {
    display: none;
  }
   
  .level-2-wrapper,
  .level-2-wrapper::after,
  .level-2::after {
    display: block;
  }
   
  .level-2-wrapper {
    width: 90%;
    margin-left: 10%;
  }
   
  .level-2-wrapper::before {
    left: -20px;
    width: 2px;
    height: calc(100% + 40px);
  }
   
  .level-2-wrapper > li:not(:first-child) {
    margin-top: 50px;
  }
}
</style>

<div class="container">
  <h1 class="level-1 rectangle">CEO</h1>
  <ol class="level-2-wrapper">
    <li>
      <h2 class="level-2 rectangle">Director</h2>
    </li>
    <li>
      <h2 class="level-2 rectangle">Personal Assistant</h2>
    </li>
  </ol>
  <ol class="level-2-wrapper">
    <li>
      <ol class="level-3-wrapper">
        <li>
          <h3 class="level-3 rectangle">...</h3>
        </li>
        <li>
          <h3 class="level-3 rectangle">...</h3>
        </li>
      </ol>
    </li>
    <li>
      <ol class="level-3-wrapper">
        <li>
          <h3 class="level-3 rectangle">...</h3>
        </li>
        <li>
          <h3 class="level-3 rectangle">...</h3>
        </li>
      </ol>
    </li>
  </ol>
  <ol class="level-2-wrapper">
    <li>
      <ol class="level-3-wrapper">
        <li>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">...</h4>
            </li>
          </ol>
        </li>
        <li>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">...</h4>
            </li>
          </ol>
        </li>
      </ol>
    </li>
    <li>
      <ol class="level-3-wrapper">
        <li>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">...</h4>
            </li>
          </ol>
        </li>
        <li>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">...</h4>
            </li>
          </ol>
        </li>
      </ol>
    </li>
  </ol>
  <ol class="level-2-wrapper">
    <li>
      <ol class="level-3-wrapper">
        <li>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">...</h4>
            </li>
          </ol>
        </li>
        <li>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">...</h4>
            </li>
          </ol>
        </li>
      </ol>
    </li>
    <li>
      <ol class="level-3-wrapper">
        <li>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">...</h4>
            </li>
          </ol>
        </li>
        <li>
          <ol class="level-4-wrapper">
            <li>
              <h4 class="level-4 rectangle">...</h4>
            </li>
          </ol>
        </li>
      </ol>
    </li>
  </ol>
</div>