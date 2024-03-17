import gql from 'graphql-tag'

const GET_MOVIES = gql`
  query movies {
    movies {
      id
      quote
      movie
      year
      image_url
      rating
      character
    }
  }
`;

export default GET_MOVIES;