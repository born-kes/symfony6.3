import React, {useState} from 'react';
const Hello: React.FC = () => {

  const [search, setSearch] = useState<string>('');

    return (
        <div>
            <label>Search:"{search}"</label>
            <hr />
            <input
                type="search"
                placeholder="input in React!"
                className="form-control"
                value={search}
                onChange={(e: React.ChangeEvent<HTMLInputElement>) => setSearch(e.target.value)}
            />
        </div>
    );
}

export {Hello};