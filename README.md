# blocks
Output arbitrary HTML/text content from any hook!

The interface for managing blocks is not yet available. Blocks can be manually added in the `blocks` table. When adding blocks, make sure the hooks you use are part of a view, otherwise outputting the content can break functionality. Generally only hooks starting with `render.` are intended to be used this way.
