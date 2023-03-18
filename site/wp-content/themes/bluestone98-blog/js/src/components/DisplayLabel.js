// demo component that creates a text label on the homepage - label created
//  after ~500ms pass from page load.
export class DisplayLabel {
  async init() {
    setTimeout(()=> {
      const displayLabelElem = document.createElement('p');   
    }, 500);
  }
}
