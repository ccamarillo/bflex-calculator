const MainTemplate = `
    <div>
        <div class="background blue">
            <div class="container-md">
                test
            </div>
        </div>
        <div class="background white">
            <div class="container-md">
                <form method="post" action="receipt.php">
                    <sections 
                        v-for="section in sections" 
                        :id="section.id" 
                        :title="section.title" 
                        :questions="section.questions"
                        :details="section.details"
                    ></sections>
                    <!-- INFECTIONS -->
                    <infections @change-total-procedures="updateInfections()"></infections> 
                    <input type="submit">Calculate!</button>    
                </form>
            </div>
        </div>
        
        
        <!--
        <div class="background white">
            <div class="container-md">
                {{ test }}
            </div>
        </div>
        -->
        
        <!--
        <div>
            <navbar></navbar>
            All content will appear below the horizontal line.
            <hr>
            <router-view></router-view>
        </div>
        -->
    </div>
`

export { MainTemplate }
