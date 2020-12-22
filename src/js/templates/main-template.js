const MainTemplate = `
    <div>
        <form method="post" action="receipt.php">
            <sections 
                v-for="section in sections" 
                :id="section.id" 
                :title="section.title" 
                :questions="section.questions"
                :details="section.details"
            ></sections>
            <div class="section background white get-results">
                <div class="container-md">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h3>See the BFlex™ Advantage</h3>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <button v-if="submit_enabled" type="submit"  v-on:click="handleSubmit">See Results</button>
                            <button v-if="!submit_enabled" type="submit" disabled class="disabled"">Fix form errors in <em>red</em> to calculate.</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="http://verathon.com" target="new">
                                <img src="./img/verathon-logo.png" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
`

export { MainTemplate }
