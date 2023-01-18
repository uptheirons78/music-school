wp.blocks.registerBlockType('ourplugin/are-you-paying-attention', {
  title: 'Are You Paying Attention ?',
  icon: 'smiley',
  category: 'common',
  attributes: {
    skyColor: { type: 'string', source: 'text', selector: '.skyColor' },
    grassColor: { type: 'string', source: 'text', selector: '.grassColor' },
  },
  edit: function (props) {
    function updateSkyColor(event) {
      props.setAttributes({ skyColor: event.target.value });
    }

    function updateGrassColor(event) {
      props.setAttributes({ grassColor: event.target.value });
    }

    return (
      <div>
        <input type='text' value={props.attributes.skyColor} placeholder='sky color' onChange={updateSkyColor} />
        <input type='text' value={props.attributes.grassColor} placeholder='grass color' onChange={updateGrassColor} />
      </div>
    );
  },
  save: function (props) {
    return (
      <>
        <p>
          Today the sky is <span className='skyColor'>{props.attributes.skyColor}</span> and the grass is{' '}
          <span className='grassColor'>{props.attributes.grassColor}</span>.
        </p>
      </>
    );
  },
});
