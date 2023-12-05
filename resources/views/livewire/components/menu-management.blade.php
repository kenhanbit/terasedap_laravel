<style>
    #menu-manager {
        margin-top: 1.5rem;
    }

    #category-list {
        display: flex;
        justify-content: space-between;
        overflow:scroll;
    }

    li {
        list-style-type: none;
    }
    .category-list-item {
        display: grid;
        align-items: center;
        min-width: max-content;
        padding: 6px 1rem;
        border-radius: 20px;
        margin: 8px;
        overflow:hidden;
        background-color: #5F5A55;
        text-align: center;
        a {
            color: #dddddd;
            text-decoration: none;
        }
    }

    .category-list-item:hover {
        cursor: pointer;
    }

</style>
<div id="menu-manager">
    <ul id="category-list">
        @foreach ($categories as $category)
        <li  class="category-list-item">
            <a>{{$category->name}}</a>
        </li>
        @endforeach
    </ul>
    <div id="admin-menu">
        @foreach ($categories as $category)
            <h3>{{$category->name}}</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                </thead>
            </table>
        @endforeach
    </div>
    
</div>

